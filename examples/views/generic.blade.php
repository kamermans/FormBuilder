{{--

@param $flash_header String Used to name the flash message holder
@param $form_id  String  The HTML form ID
@param $ng_submit String AngularJS form processor on submit
@param $action String The Laravel route to POST to
@param $form ScientiaMobile\Forms\FormHelper form object
@param $submit_label String The label for the submit button

** Wes' Note **
This form can be used to generate a view for any form
that is built with Wesleyalmeida\Forms\FormHelper

AngularJS directives included.  Default values for ids,
classes, directives, etc. are set, but you should pass in
unique names to ensure that everything works properly.

To prevent any fields from showing up in the main loop
simply pass an array of the element names to the
$form->getFieldIds() method.

This is useful when you want to display a specific
element in a different order.  Keep in mind you have
to then display that element manually.

--}}


<section class="alert alert-%% {{ $flash_header or 'flash' }}.type %% hidden" id="{{ $flash_header or 'flash'}}-holder">
    <p ng-bind="{{ $flash_header or 'flash' }}.message"></p>
</section>

<form id="{{ $form_id or 'form' }}" class="form-horizontal" method="post" action="{{ $action }}" ng-submit="{{ $ng_submit or
'processForm' }}($event)">

    <fieldset>

        @foreach($form->getFieldIds() as $element_id)
            <div class="form-group" ng-class="{'has-error' : error{{ ucfirst($element_id)}} }">
                <label for="{{ $element_id }}" class="col-lg-3">{{ $form->getLabel($element_id) }}</label>
                <div class="col-lg-9">
                    {{-- FOR PHP --}}
                    @if($errors->first($element_id))
                        <p class="text-danger help-block" ng-show="error{{ ucfirst($element_id) }}">
                            {{ $errors->first($element_id) }}
                        </p>
                    @endif
                    {{-- FOR ANGULAR --}}
                    <span class="help-block" ng-show="error{{ ucfirst($element_id) }}" ng-bind="error{{ ucfirst($element_id) }}"></span>
                    {{ $form->getField($element_id) }}
                </div>
            </div>
        @endforeach

        <div class="form-group">
            <div class="col-lg-9 col-lg-offset-3">
                <button type="submit" class="btn btn-primary">
                    {{ $submit_label }}
                    <i class="fa fa-spinner fa-spin hidden"> </i>
                </button>
            </div>
        </div>

    </fieldset>

</form>