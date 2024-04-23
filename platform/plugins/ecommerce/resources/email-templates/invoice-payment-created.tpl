{{ header }}

<p>Hi {{ customer_name }},</p>
<p>You're receiving email from <strong>{{ site_title }}</strong></p>

{% if invoice_link %}
    <p>The invoice <a href="{{ invoice_link }}">{{ invoice_code }}</a> is attached with this email.</p>

    <a href="{{ invoice_link }}">View Online</a>
{% else %}
    <p>The invoice {{ invoice_code }} is attached with this email.</p>
{% endif %}

{{ footer }}
