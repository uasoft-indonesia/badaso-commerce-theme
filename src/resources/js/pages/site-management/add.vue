<template>
  <div>
    <badaso-breadcrumb-row> </badaso-breadcrumb-row>
    <vs-row v-if="$helper.isAllowed('add_configurations')">
      <vs-col vs-lg="12">
        <vs-card>
          <div slot="header">
            <h3>{{ $t("commerceThemeSite.add.title") }}</h3>
          </div>
          <vs-row>
            <badaso-text
              v-model="config.displayName"
              size="6"
              :label="$t('commerceThemeSite.add.field.displayName.title')"
              :placeholder="$t('commerceThemeSite.add.field.displayName.placeholder')"
              required
              :alert="errors.displayName"
            ></badaso-text>
            <badaso-text
              v-model="config.key"
              size="6"
              :label="$t('commerceThemeSite.add.field.key.title')"
              required
              :placeholder="$t('commerceThemeSite.add.field.key.placeholder')"
              :alert="errors.key"
            ></badaso-text>
            <badaso-select
              v-model="config.type"
              size="6"
              :label="$t('commerceThemeSite.add.field.type.title')"
              :placeholder="$t('commerceThemeSite.add.field.type.placeholder')"
              :items="componentList"
              :alert="errors.type"
            ></badaso-select>
            <badaso-select
              v-model="config.group"
              size="6"
              :label="$t('commerceThemeSite.add.field.group.title')"
              :placeholder="$t('commerceThemeSite.add.field.group.placeholder')"
              :items="groupList"
              :alert="errors.group"
            ></badaso-select>
            <vs-col vs-lg="12">
              <label for="" class="vs-input--label">{{
                $t("commerceThemeSite.add.field.options.title")
              }}</label>
              <badaso-code-editor
                v-model="config.details"
                :alert="errors.details"
              >
              </badaso-code-editor>
            </vs-col>
            <vs-col vs-lg="12">
              <p>{{ $t("commerceThemeSite.add.field.options.description") }}</p>
              <pre
                >{{ example }}
              </pre>
            </vs-col>
          </vs-row>
        </vs-card>
      </vs-col>
      <vs-col vs-lg="12">
        <vs-card class="action-card">
          <vs-row>
            <vs-col vs-lg="12">
              <vs-button color="primary" type="relief" @click="submitForm">
                <vs-icon icon="save"></vs-icon> {{ $t("commerceThemeSite.add.button") }}
              </vs-button>
            </vs-col>
          </vs-row>
        </vs-card>
      </vs-col>
    </vs-row>
  </div>
</template>

<script>
export default {
  name: "CommerceThemeConfigurationAdd",
  components: {},
  data: () => ({
    errors: {},
    config: {
      displayName: "",
      key: "",
      type: "",
      group: "",
      details: "",
    },
    example: {
      items: [
        {
          label: "This is label",
          value: "this_is_value",
        },
      ],
    },
  }),
  computed: {
    componentList: {
      get() {
        return this.$store.getters["badaso/getComponent"];
      },
    },
    groupList: {
      get() {
        return [
          {
            label: 'Commerce Theme Configuration',
            value: 'commerceThemePanel'
          }
        ];
      },
    },
  },
  methods: {
    submitForm() {
      this.$openLoader();
      this.$api.badasoCommerceThemeConfiguration
        .add(this.$caseConvert.snake(this.config))
        .then((response) => {
          this.$closeLoader();
          this.$router.push({ name: "CommerceThemeConfiguration" });
        })
        .catch((error) => {
          this.errors = error.errors;
          this.$closeLoader();
          this.$vs.notify({
            title: this.$t("alert.danger"),
            text: error.message,
            color: "danger",
          });
        });
    },
  },
};
</script>
