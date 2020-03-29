<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Hesap
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("Hesap/coklu_save"); ?>" method="post">
                    <div class="form-group">
                        <label>Proxy</label>
                        <select class="form-control" name="proxy">
                        <?php foreach($proxies as $proxy)  {  ?>
								<option value="<?=$proxy->id;?>"><?=$proxy->ip.' - ('.$proxy->total.')';?></option>
                                <?php } ?>
							</select>
                    </div>
                    <div class="form-group">
                        <label>username,session_id</label>
                        <textarea class="form-control" placeholder="username,session_id" name="toplu"></textarea>
                    </div>
                     
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("Hesap"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>