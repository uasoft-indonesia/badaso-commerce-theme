<template>
  <div class="w-full">
    <div class="flex">
      <div class="text-sm mb-2 text-gray-700">{{ label }}</div>
      <div class="flex-grow" />
      <div class="text-sm mb-2 text-primary font-medium cursor-pointer" @click="reset">Reset</div>
    </div>
    <div class="flex gap-4 flex-nowrap justify-between w-full">
      <input
        v-for="(cell, index) in cells"
        :key="cell.key"
        :ref="`${baseRefName}${index}`"
        v-model.trim="cell.value"
        v-bind="$attrs"
        class="
          h-8
          w-8
          border
          border-gray-300
          rounded-md
          focus:outline-none
          focus:shadow-md
          focus:border-gray-700
          flex
          items-center
          text-center
          font-normal
          text-sm
        "
        :type="cellsInputTypes[index]"
        @focus="focusedCellIdx = index"
        @keydown.delete="onCellErase(index, $event)"
        @keydown="onKeyDown"
      />
    </div>
  </div>
</template>

<script>
const BASE_REF_NAME = "vue-pincode-input";
const CELL_REGEXP = "^\\d{1}$";
const DEFAULT_INPUT_TYPE = "tel";
const SECURE_INPUT_TYPE = "password";

export default {
  props: {
    value: {
      type: String,
    },
    label: {
      type: String,
      required: true,
    },
    length: {
      type: Number,
      default: 4,
    },
    autofocus: {
      type: Boolean,
      default: true,
    },
    secure: {
      type: Boolean,
      default: false,
    },
    characterPreview: {
      type: Boolean,
      default: true,
    },
    charPreviewDuration: {
      type: Number,
      default: 300,
    },
  },

  data() {
    return {
      baseRefName: BASE_REF_NAME,
      focusedCellIdx: 0,
      cells: [],
      watchers: {},
      cellsInputTypes: {},
    };
  },

  computed: {
    pinCodeComputed() {
      return this.cells.reduce((pin, cell) => pin + cell.value, "");
    },
  },

  watch: {
    value(value) {
      if (value) {
        this.onParentValueUpdated();
      } else {
        this.reset();
      }
    },

    length() {
      this.reset();
    },

    pinCodeComputed(val) {
      this.$emit("input", val);
    },
  },

  mounted() {
    this.init();
    this.onParentValueUpdated();

    if (this.autofocus) {
      this.$nextTick(this.focusCellByIndex);
    }
  },

  methods: {
    /* init stuff */

    init() {
      const inputType = this.getRelevantInputType();
      for (let key = 0; key < this.length; key += 1) {
        this.setCellObject(key);
        this.setCellInputType(key, inputType);
        this.setCellWatcher(key);
      }
    },

    setCellObject(key) {
      this.$set(this.cells, key, { key, value: "" });
    },

    setCellInputType(index, inputType = SECURE_INPUT_TYPE) {
      this.$set(this.cellsInputTypes, index, inputType);
    },

    setCellWatcher(index) {
      const watchingProperty = `cells.${index}.value`;

      this.watchers[watchingProperty] = this.$watch(
        watchingProperty,
        (newVal, oldVal) => this.onCellChanged(index, newVal, oldVal)
      );
    },

    /* handlers */

    onParentValueUpdated() {
      if (this.value.length !== this.length) {
        this.$emit("input", this.pinCodeComputed);
        return;
      }

      this.value.split("").forEach((cell, idx) => {
        this.cells[idx].value = cell || "";
      });
    },

    onCellChanged(index, newVal, oldVal) {
      if (!this.isTheCellValid(newVal, false)) {
        this.cells[index].value = "";
        return;
      }

      this.focusNextCell();

      /* performing character preview if it's enabled */
      if (this.secure && this.characterPreview) {
        setTimeout(this.setCellInputType, this.charPreviewDuration, index);
      }
    },

    onCellErase(index, e) {
      const isThisCellFilled = this.cells[index].value.length;

      if (!isThisCellFilled) {
        this.focusPreviousCell();
        e.preventDefault();
      }
    },

    onKeyDown(e) {
      switch (e.keyCode) {
        /* left arrow key */
        case 37:
          this.focusPreviousCell();
          break;

        /* right arrow key */
        case 39:
          this.focusNextCell();
          break;

        default:
          break;
      }
    },

    /* reset stuff */

    reset() {
      this.unwatchCells();
      this.init();
      this.focusCellByIndex();
    },

    unwatchCells() {
      const watchers = Object.keys(this.watchers);
      watchers.forEach((name) => this.watchers[name]());
    },

    /* helpers */

    isTheCellValid(cell, allowEmpty = true) {
      if (!cell) {
        return allowEmpty ? cell === "" : false;
      }

      return !!cell.match(CELL_REGEXP);
    },

    getRelevantInputType() {
      return this.secure && !this.characterPreview
        ? SECURE_INPUT_TYPE
        : DEFAULT_INPUT_TYPE;
    },

    focusPreviousCell() {
      if (!this.focusedCellIdx) return;

      this.focusCellByIndex(this.focusedCellIdx - 1);
    },

    focusNextCell() {
      if (this.focusedCellIdx === this.length - 1) return;

      this.focusCellByIndex(this.focusedCellIdx + 1);
    },

    focusCellByIndex(index = 0) {
      const ref = `${this.baseRefName}${index}`;
      const el = this.$refs[ref][0];

      el.focus();
      el.select();

      this.focusedCellIdx = index;
    },
  },
};
</script>
