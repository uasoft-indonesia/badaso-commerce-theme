<template>
  <div class="col-span-7">
    <component
      v-model="v"
      :is="`commerce-${payment.slug}`"
      v-for="(payment, index) in activeComponent"
      @checkout="$emit('checkout', $event)"
      :key="index"
      :options="payment.options"
    />
  </div>
</template>

<script>
import CommerceCard from "./../components/payments/commerce-card.vue";
import CommerceBankTransfer from "./payments/commerce-bank-transfer.vue";
import CommerceEMoney from "./../components/payments/commerce-e-money.vue";
import CommerceDirectDebit from "./../components/payments/commerce-direct-debit.vue";
import CommerceConvenienceStore from "./../components/payments/commerce-convenience-store.vue";
import CommerceCardlessCredit from "./../components/payments/commerce-cardless-credit.vue";
export default {
  components: {
    CommerceCard,
    CommerceBankTransfer,
    CommerceEMoney,
    CommerceDirectDebit,
    CommerceConvenienceStore,
    CommerceCardlessCredit
  },
  data() {
    return {
      v: null,
    };
  },
  props: {
    value: String,
    payments: {
      type: Array,
      required: true,
    },
    active: String,
  },
  computed: {
    activeComponent() {
      return this.$_.filter(this.payments, { slug: this.active });
    },
  },
  mounted() {
    this.v = this.value;
  },
  watch: {
    v: {
      handler(val) {
        this.$emit("input", val);
      },
    },
    value: {
      handler(val) {
        this.v = val;
      },
    },
  },
};
</script>