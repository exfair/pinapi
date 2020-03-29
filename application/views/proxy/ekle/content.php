<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Ürün Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("Proxy/save"); ?>" method="post">
                    <div class="form-group">
                        <label>IP</label>
                        <input class="form-control" placeholder="IP" name="ip">
                    </div>
                    <div class="form-group">
                        <label>Port</label>
                        <input class="form-control" placeholder="Port" name="port">
                    </div>
                    <div class="form-group" style="position: relative;">
		<label for="datetimepicker5">Buy Date</label>
	<input type="text" id="datetimepicker5" class="form-control" data-plugin="datetimepicker" data-options="{ defaultDate: '<?=date('Y/m/d');?>' }" name="buydate">
					</div>
                    <div class="form-group">
                        <label>Proxy Life</label>
                        <select class="form-control" name="proxylife">
								<option value="7">1 Week</option>
                                <option value="1">1 Day</option>
                                <option value="2">2 Day</option>
                                <option value="3">3 Day</option>
                                <option value="4">4 Day</option>
                                <option value="5">5 Day</option>
                                <option value="6">6 Day</option>
						</select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("Proxy"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>