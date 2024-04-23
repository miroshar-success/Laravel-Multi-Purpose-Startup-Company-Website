{{ header }}

<p>Hey <strong>{{ customer_name }}</strong>!</p>

<p>We've received a request to delete the account associated with the email address <strong>{{ customer_email }}</strong>.</p>

<p>To confirm this action, please follow the link below. Once you've confirmed, your account will be deleted.</p>

<p>Confirmation Link: <a href="{{ confirm_url }}">{{ confirm_url }}</a></p>

<p>Thank you for your cooperation. If you didn't initiate this request, please disregard this message.</p>

{{ footer }}
