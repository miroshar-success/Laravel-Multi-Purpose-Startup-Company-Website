<template>
    <ec-modal
        id="add-customer"
        :title="__('order.create_new_customer')"
        :ok-title="__('order.save')"
        :cancel-title="__('order.cancel')"
        @shown="loadCountries($event)"
        @ok="$emit('create-new-customer', $event)"
    >
        <div class="row">
            <div class="col-md-6 mb-3 position-relative">
                <label class="form-label">{{ __('order.name') }}</label>
                <input type="text" class="form-control" v-model="child_customer_address.name" />
            </div>
            <div class="col-md-6 mb-3 position-relative">
                <label class="form-label">{{ __('order.phone') }}</label>
                <input type="text" class="form-control" v-model="child_customer_address.phone" />
            </div>
            <div class="col-md-6 mb-3 position-relative">
                <label class="form-label">{{ __('order.address') }}</label>
                <input type="text" class="form-control" v-model="child_customer_address.address" />
            </div>
            <div class="col-md-6 mb-3 position-relative">
                <label class="form-label">{{ __('order.email') }}</label>
                <input type="text" class="form-control" v-model="child_customer_address.email" />
            </div>
            <div class="col-12 mb-3 position-relative">
                <label class="form-label">{{ __('order.country') }}</label>
                <select
                    class="form-select"
                    v-model="child_customer_address.country"
                    @change="loadStates($event)"
                >
                    <option
                        v-for="(countryName, countryCode) in countries"
                        :value="countryCode"
                        v-bind:key="countryCode"
                    >
                        {{ countryName }}
                    </option>
                </select>
            </div>
            <div class="col-md-6 mb-3 position-relative">
                <label class="form-label">{{ __('order.state') }}</label>
                <select
                    v-if="use_location_data"
                    v-model="child_customer_address.state"
                    @change="loadCities($event)"
                    class="form-select customer-address-state"
                >
                    <option v-for="state in states" :value="state.id" v-bind:key="state.id">
                        {{ state.name }}
                    </option>
                </select>
                <input
                    type="text"
                    class="form-control customer-address-state"
                    v-else
                    v-model="child_customer_address.state"
                />
            </div>
            <div class="col-md-6 mb-3 position-relative">
                <label class="form-label">{{ __('order.city') }}</label>
                <select
                    v-if="use_location_data"
                    v-model="child_customer_address.city"
                    class="form-select customer-address-city"
                >
                    <option v-for="city in cities" :value="city.id" v-bind:key="city.id">
                        {{ city.name }}
                    </option>
                </select>
                <input
                    type="text"
                    class="form-control customer-address-city"
                    v-else
                    v-model="child_customer_address.city"
                />
            </div>
            <div class="col-md-6 mb-3 position-relative" v-if="zip_code_enabled">
                <label class="form-label">{{ __('order.zip_code') }}</label>
                <input type="text" class="form-control" v-model="child_customer_address.zip_code" />
            </div>
        </div>
    </ec-modal>

    <ec-modal
        id="edit-email"
        :title="__('order.update_email')"
        :ok-title="__('order.update')"
        :cancel-title="__('order.close')"
        @ok="$emit('update-customer-email', $event)"
    >
        <div class="mb-3 position-relative">
            <label class="form-label">{{ __('order.email') }}</label>
            <input class="form-control" v-model="child_customer_address.email" />
        </div>
    </ec-modal>

    <ec-modal
        id="edit-address"
        :title="__('order.update_address')"
        :ok-title="__('order.save')"
        :cancel-title="__('order.cancel')"
        @shown="shownEditAddress"
        @ok="$emit('update-order-address', $event)"
    >
        <div class="row">
            <div class="col-md-6 mb-3 position-relative">
                <label class="form-label">{{ __('order.name') }}</label>
                <input
                    type="text"
                    class="form-control customer-address-name"
                    v-model="child_customer_address.name"
                />
            </div>
            <div class="col-md-6 mb-3 position-relative">
                <label class="form-label">{{ __('order.phone') }}</label>
                <input
                    type="text"
                    class="form-control customer-address-phone"
                    v-model="child_customer_address.phone"
                />
            </div>
            <div class="col-md-6 mb-3 position-relative">
                <label class="form-label">{{ __('order.address') }}</label>
                <input
                    type="text"
                    class="form-control customer-address-address"
                    v-model="child_customer_address.address"
                />
            </div>
            <div class="col-md-6 mb-3 position-relative">
                <label class="form-label">{{ __('order.email') }}</label>
                <input
                    type="text"
                    class="form-control customer-address-email"
                    v-model="child_customer_address.email"
                />
            </div>
            <div class="col-12 mb-3 position-relative">
                <label class="form-label">{{ __('order.country') }}</label>
                <select
                    class="form-select customer-address-country"
                    v-model="child_customer_address.country"
                    @change="loadStates($event)"
                >
                    <option
                        v-for="(countryName, countryCode) in countries"
                        :selected="child_customer_address.country == countryCode"
                        :value="countryCode"
                        v-bind:key="countryCode"
                    >
                        {{ countryName }}
                    </option>
                </select>
            </div>
            <div class="col-md-6 mb-3 position-relative">
                <label class="form-label">{{ __('order.state') }}</label>
                <select
                    v-if="use_location_data"
                    class="form-select customer-address-state"
                    v-model="child_customer_address.state"
                    @change="loadCities($event)"
                >
                    <option
                        v-for="state in states"
                        :selected="child_customer_address.state == state.id"
                        :value="state.id"
                        v-bind:key="state.id"
                    >
                        {{ state.name }}
                    </option>
                </select>

                <input
                    type="text"
                    class="form-control customer-address-state"
                    v-else
                    v-model="child_customer_address.state"
                />
            </div>
            <div class="col-md-6 mb-3 position-relative">
                <label class="form-label">{{ __('order.city') }}</label>
                <select
                    v-if="use_location_data"
                    v-model="child_customer_address.city"
                    class="form-select customer-address-city"
                >
                    <option v-for="city in cities" :value="city.id" v-bind:key="city.id">
                        {{ city.name }}
                    </option>
                </select>
                <input
                    type="text"
                    class="form-control customer-address-city"
                    v-else
                    v-model="child_customer_address.city"
                />
            </div>
            <div class="col-md-6 mb-3 position-relative" v-if="zip_code_enabled">
                <label class="form-label">{{ __('order.zip_code') }}</label>
                <input
                    type="text"
                    class="form-control customer-address-zip-code"
                    v-model="child_customer_address.zip_code"
                />
            </div>
        </div>
    </ec-modal>
</template>

<script>
export default {
    props: {
        child_customer_address: {
            type: Object,
            default: {},
        },
        zip_code_enabled: {
            type: Number,
            default: 0,
        },
        use_location_data: {
            type: Number,
            default: 0,
        },
    },
    data: function () {
        return {
            countries: [],
            states: [],
            cities: [],
        }
    },
    components: {},
    methods: {
        shownEditAddress: function ($event) {
            this.loadCountries($event)

            if (this.child_customer_address.country) {
                this.loadStates($event, this.child_customer_address.country)
            }

            if (this.child_customer_address.state) {
                this.loadCities($event, this.child_customer_address.state)
            }
        },
        loadCountries: function () {
            let context = this
            if (_.isEmpty(context.countries)) {
                axios
                    .get(route('ajax.countries.list'))
                    .then((res) => {
                        context.countries = res.data.data
                    })
                    .catch((res) => {
                        Botble.handleError(res.response.data)
                    })
            }
        },
        loadStates: function ($event, country_id) {
            if (!this.use_location_data) {
                return false
            }

            let context = this
            axios
                .get(route('ajax.states-by-country', { country_id: country_id || $event.target.value }))
                .then((res) => {
                    context.states = res.data.data
                })
                .catch((res) => {
                    Botble.handleError(res.response.data)
                })
        },
        loadCities: function ($event, state_id) {
            if (!this.use_location_data) {
                return false
            }

            let context = this
            axios
                .get(route('ajax.cities-by-state', { state_id: state_id || $event.target.value }))
                .then((res) => {
                    context.cities = res.data.data
                })
                .catch((res) => {
                    Botble.handleError(res.response.data)
                })
        },
    },
}
</script>
