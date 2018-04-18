<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to Real Realtors</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
</head>

<nav class="navbar navbar-expand-lg realtor-nav">
    <a class="navbar-brand" href="/">
        <i class="fas fa-home"></i>
        Real Realtors
    </a>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/admin/dashboard">Admin</a>
        </li>
        <?
        /**if admin we want to add a logout option and notification manager**/
        if(isset($admin)):?>
            <li class="nav-item">
                <a class="nav-link" href="/admin/authenticate/logout">Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/dashboard/notifications">Notifications</a>
            </li>
        <?endif;?>
    </ul>
</nav>
<body class="container">

<?
/**dont want the image if admin is viewing. ideally in a production environment each component would have its own header/footers**/
if(($this->router->fetch_class() != 'dashboard') && ($this->router->fetch_class() != 'authenticate')):?>
<div class="row">
    <div class="col-md-12">
        <img src="/assets/images/home.jpg" alt="driveway"
             class="img-fluid header-image"/>
    </div>
</div>
<?endif;?>