<div class="col-sm-offset-3 col-sm-6">
    <section id="login-form" class="panel panel-primary">
        <header class="panel-heading">
            <h3>{{ $title }}</h3>
        </header>
        <section class="panel-body">
            <form class="form-horizontal" method="post" action="{{ URL::route('login') }}">
                <fieldset>
                    @foreach($form->getFieldIds(['remember_me']) as $element_id)
                        <div class="form-group">
                            <label for="{{ $element_id }}" class="col-lg-2">{{ $form->getLabel($element_id) }}</label>
                            <div class="col-lg-10">
                                @if($errors->first($element_id))
                                    <p class="text-danger">{{ $errors->first($element_id) }}</p>
                                @endif
                                {{ $form->getField($element_id) }}
                            </div>
                        </div>
                    @endforeach

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            {{ $form->getField('remember_me') }}
                            <label for="remember_me" class="">{{ $form->getLabel('remember_me') }}</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>

                </fieldset>
            </form>
        </section>

    </section>
</div>