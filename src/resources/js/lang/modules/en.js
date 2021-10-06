export const label = "English";

export default {
  vuelidate: {
    error: "This field is invalid"
  },
  action: {
    bin: "Recycle Bin",
    bulkRestore: "Bulk Restore",
    bulkDeletePermanent: "Bulk Delete Permanent",
    restore: {
      title: "Restore Item",
      text: "Are you sure want to restore this item?",
      accept: "Restore",
      cancel: "Cancel"
    }
  },
  commerceThemeSite: {
    action: "Action",
    deletedImage: {
      title: "Deleted Image",
      text: "The selected image was successfully deleted",
    },
    configUpdated: "Config Updated",
    add: {
      title: "Add Commerce Theme Configuration",
      field: {
        displayName: {
          title: "Display Name",
          placeholder: "Example: Display Name",
        },
        key: {
          title: "Key",
          placeholder: "Example: key_sample",
        },
        type: {
          title: "Type",
          placeholder: "Type",
        },
        group: {
          title: "Group",
          placeholder: "Group",
        },
        options: {
          title: "Options",
          description:
            "Options is required for Checkbox, Radio, Select, Select-multiple. Example: ",
          example: `{"items": [{"label":"This is label","value":"this_is_value"}] }`,
        },
      },
      button: "Save",
    },
    edit: {
      multiple: "Update Configurations",
    },
  },
};
