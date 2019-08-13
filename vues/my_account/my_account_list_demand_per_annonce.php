<div class="col-xs-12" style="border-bottom:1px solid #eeeeee; margin-bottom:10px; margin-top:10px;"><?
    if(!empty($row_annonce->date_waiting))
    {
        foreach($row_annonce->date_waiting as $row_wait)
        {?>
            <div class="col-sm-6 col-md-6">
                <div class="thumbnail">
                    <span style="font-size: 30px" class="glyphicon glyphicon-star-empty"></span>
                    <hr style="margin-top:5px; margin-bottom:5px;">
                    <div class="caption">
                        <p>
                            Date d'arrivée : 25/05/2019
                            &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                            Date de départ : 25/05/2019
                        </p>
                        
                        <p class="text-muted">
                            <span class="glyphicon glyphicon-user"></span>
                            &nbsp;&nbsp;Jean&nbsp;&nbsp;
                            <span style="color:#5bc0de;" class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <span style="color:#5cb85c;" class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <span style="color:#d9534f;" class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;|&nbsp;&nbsp;
                            Prix moyen estimé : 450€<br>
                        </p>
                    </div>
                </div>
            </div><?
        }
    }?> 
</div> 

<div class="col-xs-12"><?
    if(!empty($row_annonce->date_reserved))
    {
        foreach($row_annonce->date_reserved as $row_reserved)
        {?>
            <div class="col-sm-6 col-md-6">
                <div class="thumbnail">
                    <span style="font-size: 30px; color:#f0f000;" class="glyphicon glyphicon-star"></span>
                    <hr style="margin-top:5px; margin-bottom:5px;">
                    <div class="caption">
                        <p>
                            Date d'arrivée : 25/05/2019
                            &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                            Date de départ : 25/05/2019
                        </p>
                        
                        <p class="text-muted">
                            <span class="glyphicon glyphicon-user"></span>
                            &nbsp;&nbsp;Jean&nbsp;&nbsp;
                            <span style="color:#5bc0de;" class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <span style="color:#5cb85c;" class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <span style="color:#d9534f;" class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;|&nbsp;&nbsp;
                            Prix moyen estimé : 450€
                        </p>
                    </div>
                </div>
            </div><?
        }
    }?>
</div>