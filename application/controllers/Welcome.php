<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Welcome
 */
class Welcome extends CI_Controller
{

    private $validProperties;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('property');
        $this->load->model('state');
        $this->load->model('infoRequest');
        $this->load->library('form_validation');
        $this->validProperties = array(1, 2, 3); //php5.4 here, not shorthand I'm afraid
    }

    /**
     * default route for class if no parameter is passed via url
     */
    public function index()
    {

        //gets a list of all valid properties
        $data['properties'] = $this->property->get();
        
        //render view - 
        $this->load->view('includes/header');
        $this->load->view('welcome_message', $data);
        $this->load->view('includes/footer');
    }


    /**
     * @param int $propertyId
     *
     * Loads information request form for selected property
     */
    public function requestInfo($propertyId)
    {
        //check to see if the property id is valid
        if (!$this->validatePropertyId($propertyId)) {
            redirect('/');
        }

        $data = $this->getViewData();
        //we will send this to the view and set it in a hidden field in the from
        $data['property_id'] = $propertyId;
        
        $this->load->view('includes/header');
        $this->load->view('request_info', $data);
        $this->load->view('includes/footer');
    }

    /**
     * Receives form data from info request, validates, calls to insert into db and
     * finally calls to send a notification
     */
    public function submit_request()
    {
        //validate the required fields are submitted, form validation rules can be found under /config/form_validation.php
        if ($this->form_validation->run('request')) {
            //make sure the captcha is correct
            $this->validateCaptcha();
            $infoRequest = $this->input->post();
            //clean phone number for storage
            $this->sanitizeInfoRequest($infoRequest);
            //captcha is valid, we no longer need this
            unset($infoRequest['captcha']);

            if($this->infoRequest->insert($infoRequest)){
                $this->sendNotification($infoRequest);
            }
        }

        // form validation failed something, we will need to re render the view
        $data = $this->getViewData();
        $data['property_id'] = $this->input->post('property_id');

        $this->load->view('includes/header');
        $this->load->view('request_info', $data);
        $this->load->view('includes/footer');
    }

    /**
     * @return array | bool
     *
     * Calls to captcha lib to create a captcha and returns
     * the metadata
     */
    private function createCaptcha()
    {
        return $this->captcha_lib->create();
    }

    /**
     * @param $propertyID
     * @return bool
     *
     * Make sure the property ID passed is a valid property ID -
     * In a production environment this id could come from a database.
     * This would prevent requesting for a non existent property
     */
    private function validatePropertyId($propertyID)
    {
        return in_array($propertyID, $this->validProperties);
    }

    private function validateCaptcha()
    {
        if (!$this->captcha_lib->validateCaptcha($this->input->post('captcha'))) {
            $this->form_validation->set_message('required', 'Please Enter the text exactly as it appears');
            $this->session->set_flashdata('error', 'Please type the text from the image exactly as it appears');
            redirect('/welcome/requestInfo/'.$this->input->post('property_id'));
        }

    }

    /**
     * @return array
     *
     * Returns an array of captcha data and states needed form submission views
     */
    private function getViewData()
    {
        $captcha = $this->createCaptcha();
        $data['captcha_image'] = $captcha['image'];
        $data['states'] = $this->state_lib->get();
        /**
         * we could store captcha metadata here to compare after form is submitted, I've
         * opted to use session for brevity
         */
        $this->session->set_userdata('captcha_word', $captcha['word']);
        return $data;
    }

    /**
     * @param $infoRequest
     * Cleans phone number
     */
    public function sanitizeInfoRequest(&$infoRequest)
    {
        //remove anything that's not a number from phone
        $infoRequest['phone'] = preg_replace("/[^0-9]/", "", $infoRequest['phone']);
    }

    /**
     * @param array $infoRequest
     *
     * Calls to send an admin an notification
     */
    private function sendNotification($infoRequest)
    {
        $this->load->library('emailer');

        if(! $this->emailer->sendNewInfoRequestNotification($infoRequest)){
                //do something like log an error
        }

        $this->session->set_flashdata('success', 'Thank You');
        redirect('/');

    }

}
