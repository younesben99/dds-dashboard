<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,500;1,600&display=swap"
    rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" integrity="sha512-QKC1UZ/ZHNgFzVKSAhV5v5j73eeL9EEN289eKAEFaAjgAiobVAnVv/AGuPbXsKl1dNoel3kNr6PYnSiTzVVBCw==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.min.css" integrity="sha512-FEQLazq9ecqLN5T6wWq26hCZf7kPqUbFC9vsHNbXMJtSZZWAcbJspT+/NEAQkBfFReZ8r9QlA9JHaAuo28MTJA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.23.0/ui/trumbowyg.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.23.0/trumbowyg.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />


  <style>
    *, ::after, ::before {
    box-sizing: revert;
}
  </style>

  <link rel="stylesheet" href="<?php echo(get_site_url()); ?>/wp-content/plugins/dds-tools/assets/css/dds_forms.css" />

  <!-- sortable -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js" integrity="sha512-Eezs+g9Lq4TCCq0wae01s9PuNWzHYoCMkE97e2qdkYthpI0pzC3UGB03lgEHn2XM85hDOUF6qgqqszs+iXU4UA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script>


  <!-- dropzone -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" type="text/css" />


  <script type="text/javascript" src="/wp-content/plugins/dds-dashboard/assets/js/accordion.min.js"></script>


  

  <link href="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/css/dashboard-style.css?v=<?php echo(uniqid()); ?>" rel="stylesheet">
  <script src="<?php echo(get_site_url()); ?>/wp-content/plugins/dds-dashboard/assets/js/dds-edit.js?v=<?php echo(uniqid()); ?>"></script>
  <script src="<?php echo(get_site_url()); ?>/wp-content/plugins/dds-dashboard/assets/js/dds-edit-dropzone.js?v=<?php echo(uniqid()); ?>"></script>
  <script src="<?php echo(get_site_url()); ?>/wp-content/plugins/dds-dashboard/assets/js/dds-update.js?v=<?php echo(uniqid()); ?>"></script>
  <script src="<?php echo(get_site_url()); ?>/wp-content/plugins/dds-dashboard/assets/js/dds-backend-popup.js?v=<?php echo(uniqid()); ?>"></script>
  <link rel="stylesheet" href="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/css/dds-backend-popup.css?v=<?php echo(uniqid()); ?>" />



  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/img/favicon/site.webmanifest">
  <link rel="mask-icon" href="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <link rel="shortcut icon" href="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/img/favicon.ico">
  <meta name="msapplication-TileColor" content="#2b5797">
  <meta name="msapplication-config" content="<?php echo get_home_url();?>/wp-content/plugins/dds-dashboard/assets/img/favicon/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">



  <title>Archive</title>

</head>

<body>  