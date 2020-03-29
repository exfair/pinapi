<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?=count($items)." Hesap mevcut";?>
            <a href="<?php echo base_url("Hesap/baslat"); ?>" class="btn btn-outline btn-danger btn-m pull-right"> <i class="fa fa-plus"></i>Başlat</a>

            <a href="<?php echo base_url("Hesap/new_form"); ?>" class="btn btn-outline btn-primary btn-xs pull-right"> <i class="fa fa-plus"></i>Yeni Ekle</a>

        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">




                <?php  if(!isset($items)) { ?>
                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("Hesap/new_form"); ?>">tıklayınız</a></p>
                </div>
                <?php } ?>
                
                <form action="<?php echo base_url("Hesap/selected"); ?>" method="post">

                <table class="table table-hover table-striped table-bordered content-container">
                    <thead>
                    <th class="order">

                    <div class="checkbox checkbox-danger">
                                <input type="checkbox" id="selectAll">
                                <label for="selectAll">Seç</label>

							    </div>
                    
                    </th>
                <th class="w50">#ID</th>
                        <th>Proxy ID</th>
                        <th>username</th>
                        <th>totalpin</th>
                        <th>işlem</th>
                    </thead>
                    <tbody class="" data-url="">    
                        
                             <?php foreach($items as $item) { ?>
                        
                            <tr id="ord-X">
                                <td class="order">
                                <div class="checkbox checkbox-danger">
                                <input type="checkbox" id="selected-<?=$item->id;?>" name="selected-<?=$item->id;?>">
                                <label for="selected-<?=$item->id;?>">Seç</label>

							    </div>
                                </td>
                                <td class="w50 text-center"><?php echo $item->id; ?></td>
                                <td><?php echo $item->proxy_id; ?></td>
                                <td><?php echo $item->username; ?></td>
                                <td><?php echo $item->totalpin; ?></td>
                                <td>
                                    <button
                                        data-url="<?php echo base_url("Hesap/delete/$item->id"); ?>"
                                        class="btn btn-sm btn-danger btn-outline remove-btn">
                                        <i class="fa fa-trash"></i> Sil
                                    </button>                                    
                                </td> 
                            </tr>
                                 <?php } ?>
                    </tbody>

                </table>
                <div class="col-sm-3" style="margin-top:10px;float:right;">
                        <input class="form-control" placeholder="Limit" name="limit">
                    </div>
                <div class="form-group">
                <button style="float:right;margin:10px;" type="submit" class="btn btn-primary btn-md">Başlat</button>
                </div>

                </form>

        </div><!-- .widget -->

    </div><!-- END column -->
</div>
<script type="text/javascript">
  $("#selectAll").click(function() {
    $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
});

$("input[type=checkbox]").click(function() {
    if (!$(this).prop("checked")) {
        $("#selectAll").prop("checked", false);
    }
});
</script>