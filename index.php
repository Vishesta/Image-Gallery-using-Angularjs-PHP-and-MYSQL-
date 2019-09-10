<?php


session_start();

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Image Gallery </title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>  
           
           <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

  <style>
  .form_style
  {
   width: 600px;
   margin: 0 auto;
  }
  .topnav-right {
  position: absolute;

top: 8px;

right: 16px;

font-size: 18px;
}
.loading {
  width: 500px;
  margin: 0 auto;
}

.loading {
  text-align: center;
  font-style: italic;
  margin-top: 50px;
  margin-bottom: 100px;
  display: none;
}

  </style>
 </head>
 <body>
  <br />
  
  <br />

  <div ng-app="login_register_app" ng-controller="login_register_controller" >
   <?php
   if(!isset($_SESSION["name"]))
   {
   ?>
   <div class="alert {{alertClass}} alert-dismissible" ng-show="alertMsg">
    <a href="#" class="close" ng-click="closeMsg()" aria-label="close">&times;</a>
    {{alertMessage}}
   </div>
<div class="container form_style">
   <div class="panel panel-default" ng-show="login_form">
    <div class="panel-heading">
     <h3 class="panel-title">Login</h3>
    </div>
    <div class="panel-body">
     <form method="post" ng-submit="submitLogin()">
      <div class="form-group">
       <label>Enter Your Username:</label>
       <input type="text" name="name" ng-model="loginData.name" class="form-control" />
      </div>
      <div class="form-group">
       <label>Enter Your Password</label>
       <input type="password" name="password" ng-model="loginData.password" class="form-control" />
      </div>
      <div class="form-group" align="center">
       <input type="submit" name="login" class="btn btn-primary" value="Login" />
       <br />
      	 
       <input type="button" name="register_link" class="btn btn-primary btn-link" ng-click="showRegister()" value="Register" />
      </div>
     </form>
    </div>
   </div>

   
 </div>
   <div class="panel panel-default" ng-show="register_form">
    <div class="panel-heading">
     <h3 class="panel-title">Register</h3>
    </div>
    <div class="panel-body">
     <form method="post" ng-submit="submitRegister()">
      <div class="form-group">
       <label>Enter Your Name</label>
       <input type="text" name="name" ng-model="registerData.name" class="form-control" />
      </div>
     <div class="form-group">
       <label>Enter Your Password</label>
       <input type="password" name="password" ng-model="registerData.password" class="form-control" />
      </div>
      <div class="form-group" align="center">
       <input type="submit" name="register" class="btn btn-primary" value="Register" />
       <br />
       <input type="button" name="login_link" class="btn btn-primary btn-link" ng-click="showLogin()" value="Login" />
      </div>
     </form>
    </div>
   </div>
 </div>
   <?php
   }
   else
   {
   ?>
   <h3 align="center">Welcome to the Gallery - <?php echo $_SESSION["name"];?></h3>
<br />
    <div class="topnav-right">
    <a href="logout.php">Logout</a></p>
      <input type="button" name="change password" class="btn btn-primary btn-link" ng-click="changePassword()" value="Change Password" />
  </div>
  <body>
    <div  class="container" ng-init="select()">
<div class="col-md-4">  
                     <input type="file" file-input="files" />  
                </div>  
                <div class="col-md-6">  
                     <button class="btn btn-info" ng-click="uploadFile()">Upload</button>  
                </div>  
                <div style="clear:both"></div>  
                <br /><br />  
                  <div class="content">
                  
                <div class="col-md-3" ng-repeat="image in images">  
                    <img ng-src="upload/{{image.name}}" width="200" height="200" style="padding:16px; border:1px solid #f1f1f1; margin:16px;" />  
                       
                </div> 
                <div class="loading">Loading...</div>
            </div> 
           

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="infiniscroll.js"></script>
    <script>
    $(document).ready(function(){
        $('.content').infiniscroll();
    });
    </script>

                <br/>
                <br/>
     </div>

  
   <?php
   }
   ?>

  
 </body>
</html>

<script>
var app = angular.module('login_register_app', []);
app.controller('login_register_controller', function($scope, $http){
 $scope.closeMsg = function(){
  $scope.alertMsg = false;
 };

 $scope.login_form = true;

 $scope.showRegister = function(){
  $scope.login_form = false;
  $scope.register_form = true;
  $scope.alertMsg = false;
 };
$scope.changePassword = function(){   

       window.location = "http://localhost/login%201/changepassword.php";
 }

     
 

 $scope.showLogin = function(){
  $scope.register_form = false;
  $scope.login_form = true;
  $scope.alertMsg = false;
 };

 $scope.submitRegister = function(){
  $http({
   method:"POST",
   url:"register.php",
   data:$scope.registerData
  }).success(function(data){
   $scope.alertMsg = true;
   if(data.error != '')
   {
    $scope.alertClass = 'alert-danger';
    $scope.alertMessage = data.error;
   }
   else
   {
    $scope.alertClass = 'alert-success';
    $scope.alertMessage = data.message;
    $scope.registerData = {};
   }
  });
 };
  $scope.submitLogin = function(){
  $http({
   method:"POST",
   url:"login.php",
   data:$scope.loginData
  }).success(function(data){
   if(data.error != '')
   {
    $scope.alertMsg = true;
    $scope.alertClass = 'alert-danger';
    $scope.alertMessage = data.error;
   }
   else
   {
    location.reload();
   }
  });
 };



  $scope.uploadFile = function(){  
           var form_data = new FormData();  
           angular.forEach($scope.files, function(file){  
                form_data.append('file', file);  
           });  
           $http.post('upload.php', form_data,  
           {  
                transformRequest: angular.identity,  
                headers: {'Content-Type': undefined,'Process-Data': false}  
           }).success(function(response){  
                alert(response);  
                $scope.select();  
           });  
      }  
      $scope.select = function(){  
           $http.get("select.php")  
           .success(function(data){  
                $scope.images = data;  
           });  
      }  
 }); 
app.directive("fileInput", function($parse){  
      return{  
           link: function($scope, element, attrs){  
                element.on("change", function(event){  
                     var files = event.target.files;  
                   
                     $parse(attrs.fileInput).assign($scope, element[0].files);  
                     $scope.$apply();  
                });  
           }  
      }

 }); 

</script>
 
