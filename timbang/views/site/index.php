<?php
$this->pageTitle = 'Balance and Transportation Service';
?>
<div class="row-fluid">
    <div class="span8">
        <div class="row-fluid">
            <div class="img-polaroid span6" style="padding: 15px">
                <b>PT Sinar Harapan</b><br/>
                <i class="icon-home"></i> Jln. Raya Sumber Pasir Km 5, Pakis, Malang<br/>
                <i class="icon-user"></i> (0341) 789 555<br/>
                <i class="icon-envelope"></i> cv.sinarharapan84@yahoo.com
            </div>  
            <div class="img-polaroid span6" style="padding: 15px">
                <b>PT Sinar Harapan (Talok)</b><br/>
                <i class="icon-home"></i> Jln. Raya Gatot Subroto, Talok<br/>
                <i class="icon-user"></i> -<br/>
                <i class="icon-envelope"></i> -
            </div>
        </div>
    </div>
    <div class="span4">
        <div class="todo">
            <h4>Latest Logged-in Users
                <a href="#" class="icon tip" oldtitle="Configure" title=""><span class="icon16 iconic-icon-cog"></span></a>

            </h4>
            <ul>

                <?php
                $listUser = User::model()->listUser();
                $oUserLogs = UserLog::model()->findAll(array('order' => 'created DESC', 'limit' => '5'));
                foreach ($oUserLogs as $oUserLog) {
                    if (isset($oUserLog->User->Roles->name)) {
                        echo '<li class="clearfix">' .
                        $oUserLog->User->name . ' | ' . $oUserLog->User->Roles->name . '
                        <span class="label pull-right" style="margin-top: 6px;">' . landa()->ago($oUserLog->created) . '</span>
                        </li> ';
                    };
                }
                ?>

            </ul>
        </div>
    </div>
</div>

