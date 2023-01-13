<h2>Benvingut  <?=$this->username?></h2>
<h3><?=$this->role?></h3>
<?=$this->lastRecordInfo?>
<?=$this->recordTable?>
<form method="POST" action="<?=APP_BASE_URL?>/register">
    <?=$this->checkinRequired ? "<button class=\"button entrada\" type=\"submit\"><span>Entrada</span></button>" : 
                                "<button class=\"button sortida\" type=\"submit\"><span>Sortida</span></button>"?>
</form>
<a href="<?=APP_BASE_URL?>/logout"><button class="button logout"><span>Logout</span></button></a>
