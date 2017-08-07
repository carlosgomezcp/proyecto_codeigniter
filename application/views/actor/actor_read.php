<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Actor Read</h2>
        <table class="table">
	    <tr><td>Fullname</td><td><?php echo $fullname; ?></td></tr>
	    <tr><td>Last Update</td><td><?php echo $last_update; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('actor') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>