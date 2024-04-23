<section class="section">
    {!!
        $form
            ->modify('submit', 'submit', [
                    'attr' => [
                        'class' => 'btn btn-brand-lg btn-full font-md-bold',
                    ],
                ])
            ->modify('remember', 'html', ['html' => sprintf('<div class="col-6">
                    <label class="cb-container">
                        <input type="checkbox" value="1" name="remember" id="remember-check">
                        <span class="text-small">%s</span>
                        <span class="checkmark"></span>
                    </label>
                </div>', __('Remember me'))], true)
            ->renderForm()
    !!}
</section>
