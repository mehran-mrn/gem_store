<?php $ZarinpalStandard = app('Mehran\Zarinpal\Payment\Standard') ?>

<body data-gr-c-s-loaded="true" cz-shortcut-listen="true">
    You will be redirected to the Zarinpal website in a few seconds.


    <form action="{{ $ZarinpalStandard->getZarinpalUrl() }}" id="Zarinpal_standard_checkout" method="POST">
        <input value="Click here if you are not redirected within 10 seconds..." type="submit">

        @foreach ($ZarinpalStandard->getFormFields() as $name => $value)

            <input type="hidden" name="{{ $name }}" value="{{ $value }}">

        @endforeach
    </form>

    <script type="text/javascript">
        document.getElementById("Zarinpal_standard_checkout").submit();
    </script>
</body>