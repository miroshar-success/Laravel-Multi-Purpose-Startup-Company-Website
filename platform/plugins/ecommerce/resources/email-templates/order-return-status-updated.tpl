{{ header }}

<p>Dear <strong>{{ customer_name }}</strong>,</p>

<p>We wanted to inform you that the status of your return request for order <strong>{{ order_id }}</strong> has been updated.</p>

<p>The new status of your return request is: <strong>{{ status }}</strong>.</p>

{% if description %}
<p>Moderator's note: {{ description }}</p>
{% endif %}

<p>If you have any questions or concerns regarding this update, please don't hesitate to contact our customer support team.</p>

{{ footer }}
