
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">It`s a dummy startpage</h1>
        <div class="alert alert-info">
            ESTO SON LAS MARCAS

        </div>
        <div class="panel-body">
            {{ Form::open()}}
            <fieldset>
                {{ Form::button(Lang::get('admin::lang.auth.login'), ['class' => 'btn btn-lg btn-success btn-block', 'type' => 'submit']) }}

            </fieldset>
            {{ Form::close() }}
        </div>

    </div>
</div>

