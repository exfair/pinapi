<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Hesap
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("Hesap/save"); ?>" method="post">
                    <div class="form-group">
                        <label>Proxy</label>
                        <select class="form-control" name="proxy">
                        <?php foreach($proxies as $proxy)  {  ?>
								<option value="<?=$proxy->id;?>"><?=$proxy->ip.' - ('.$proxy->total.')';?></option>
                                <?php } ?>
							</select>
                    </div>
                    <div class="form-group">
                        <label>session_id</label>
                        <input class="form-control" placeholder="session_id" name="session_id">
                    </div>
                      <div class="form-group">
                        <label>username</label>
                        <input class="form-control" placeholder="username" name="username">
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("Hesap"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>