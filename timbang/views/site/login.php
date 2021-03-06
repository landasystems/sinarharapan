<?php
$this->pageTitle = Yii::app()->name . ' - Login';
?>

<style>
    .newLogin{
        left: 50%;
        top: 50%;
        width: 300px;
        height: auto;
        position: absolute;
        margin-top: -200px;
        margin-left: -150px;
        padding: 0px 20px;
        border: 3px solid forestgreen;
        box-shadow: 1px 1px 1px 1px #ccc;
        border-radius: 2px;
        background: white;
        border-radius: 20px;
    }
    
    .newLogin .form-actions {
        border-radius: 0 0 20px 20px;
    }
</style>


<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'login-form',
//    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'type' => 'horizontal',
    ),
        ));
?>


<div class="container-fluid">
    <div class="newLogin">        
        <form class="form-horizontal" action="dashboard.html" />
        <center>

            <h2 style="margin:25px 0 0 0">CV. Sinar Harapan</h2>
            <h3 class="green" style="font-weight: bold;">Sistem Manajemen Timbang</h3>
        </center>
        <hr style="margin:10px 0px 20px 0px">

        <div class="form-row row-fluid">   
            <div class="span12"> 
                <div class="form-row row-fluid">
                    <div class="span12">            
                        <div class="row-fluid">
                            <div class="span4">Username</div>
                            <div class="span8">
                                <?php echo $form->textField($model, 'username', array('class' => 'span12')); ?>
                                <span class="red"><?php echo $form->error($model, 'username'); ?></span>
                            </div>                   
                        </div>
                    </div>
                </div>


                <div class="form-row row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <div class="span4">Password</div>
                            <div class="span8">
                                <?php echo $form->passwordField($model, 'password', array('class' => 'span12')); ?>
                                <span class="red"><?php echo $form->error($model, 'password'); ?></span>    
                            </div>             
                        </div>                
                    </div>
                </div>
            </div>  

        </div>


        <div class="form-row row-fluid">                       
            <div class="span12">
                <div class="row-fluid">
                    <div class="form-actions" style="margin:0px -20px">
                        <div class="span12 controls" style="padding:0px 20px">
                            <?php echo $form->checkBox($model, 'rememberMe', array('class' => 'left', 'style' => 'width:20px')); ?> Keep me login in
                            <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=""> <i class="icon-search"></i></a>-->
                            
                            <button type="submit" style="background:forestgreen" class="btn btn-info right" id="loginBtn"><span class="icon16 icomoon-icon-enter white"></span> Login</button>
                            <!--<a href=""   style="background:forestgreen;height: 30px;margin-right: 10px;" class="btn btn-info right" ><span class="icon16 icon-search white"></span> </a>-->
                        <!--<a href="" style="background:forestgreen;height: 20px;margin-right: 10px;" class="btn btn-info right" id="loginBtn"><span class="icon16 icon-search white"></span> </a>-->
                        </div>
                    </div>
                </div>
            </div> 
        </div> 

        </form>
    </div>

</div><!-- End .container-fluid -->

<?php $this->endWidget(); ?>
