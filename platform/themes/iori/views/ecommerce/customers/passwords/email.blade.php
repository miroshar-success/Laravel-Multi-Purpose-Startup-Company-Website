<section class="section">
    {!!
        $form
            ->modify('submit', 'submit', [
                    'attr' => [
                        'class' => 'btn btn-brand-lg btn-full font-md-bold',
                    ],
                ])
            ->renderForm()
    !!}
</section>
