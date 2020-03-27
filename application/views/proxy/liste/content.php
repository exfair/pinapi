<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Kategori Listesi
            <a href="<?php echo base_url("Proxy/new_form"); ?>" class="btn btn-outline btn-primary btn-xs pull-right"> <i class="fa fa-plus"></i> Yeni Ekle</a>

        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

                <?php  if(!isset($items)) { ?>
                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("Proxy/new_form"); ?>">tıklayınız</a></p>
                </div>
                <?php } ?>

                <table class="table table-hover table-striped table-bordered content-container">
                    <thead>
                    <th class="order"><i class="fa fa-reorder"></i></th>
                <th class="w50">#ID</th>
                        <th>İp</th>
                        <th>Port</th>
                        <th>BuyDate</th>
                        <th>Expire</th>
                        <th>İşlem</th>
                        
                    </thead>
                    <tbody class="sortable" data-url="">    
                        
                             <?php foreach($items as $item) { ?>
                        
                            <tr id="ord-X">
                                <td class="order"><i class="fa fa-reorder"></i></td>
                                <td class="w50 text-center"><?php echo $item->id; ?></td>
                                <td><?php echo $item->ip; ?></td>
                                <td><?php echo $item->port; ?></td>
                                <td><?php echo $item->buyDate; ?></td>
                                <td><?php echo $item->expireDate; ?></td>
                                <td>
                                    <button
                                        data-url="<?php echo base_url("Proxy/delete/$item->id"); ?>"
                                        class="btn btn-sm btn-danger btn-outline remove-btn">
                                        <i class="fa fa-trash"></i> Sil
                                    </button>                                    
                                </td>
                            </tr>
                                 <?php } ?>
                    </tbody>

                </table>


        </div><!-- .widget -->
    </div><!-- END column -->
</div>