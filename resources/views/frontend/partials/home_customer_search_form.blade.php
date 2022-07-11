<div class="row">
    <div class="col-md-3 col-sm-4">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <div class="input-group top_search">
            <input type="text" id="name_sr" class="form-control input-search" placeholder="{{ trans('global.name') }}">
            <span class="input-group-btn">
<button class="btn btn-default" type="button"><i class="fa fa-user"></i></button>
</span>
        </div>
    </div>
    <div class="col-md-3 col-sm-4">
        <div class="input-group top_search">
            <input type="text" id="lastname_sr" class="form-control input-search" placeholder="{{ trans('global.last_name') }}">
            <span class="input-group-btn">
<button class="btn btn-default" type="button"><i class="fa fa-user"></i></button>
</span>
        </div>
    </div>
    <div class="col-md-3 col-sm-4">
        <div class="input-group top_search">
            <input type="tel" id="phone_sr" class="form-control input-search" name="phone" placeholder="888 888 8888" pattern="[0-9]{3} [0-9]{3} [0-9]{4}" maxlength="12"  title="Ten digits code" required/>
            <span class="input-group-btn">
<button class="btn btn-default" type="button"><i class="fa fa-phone"></i></button>
</span>
        </div>
    </div>
    <div class="col-md-3 col-sm-4">
        <div class="input-group top_search">
            <button class="btn btn-primary btn-block rounded-pill" onclick="clearInput()">Clear</button>
        </div>
    </div>
    <div class="col-md-12" id="customer_table" style="display: none;">
        <table class="table table-hover table-bordered table-responsive-sm">
            <tr>
                <th>{{ trans('global.name') }}</th>
                <th>{{ trans('global.last_name') }}</th>
                <th>{{ trans('global.phone') }}</th>
                <th>{{ trans('global.address') }}</th>
            </tr>
            <tbody id="table_body">

            </tbody>
        </table>
    </div>
</div>
