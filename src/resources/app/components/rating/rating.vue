<template>
  <div class="flex items-center" :aria-label="value + ' of 5'">
    <div v-for="(star, index) in stars" :key="index" class="flex">
      <svg
        :style="[
          { fill: `url(#gradient${star.raw})` },
          { width: starWidth },
          { height: starHeight },
        ]"
        aria-hidden="true"
        :stroke="stroke ? 'rgba(6, 187, 211, 1)' : ''"
      >
        <polygon :points="getStarPoints" style="fill-rule: nonzero" />
        <defs>
          <linearGradient :id="`gradient${star.raw}`">
            <stop
              id="stop1"
              :offset="star.percent"
              stop-opacity="1"
              :stop-color="getFullFillColor(star)"
            ></stop>
            <stop
              id="stop2"
              :offset="star.percent"
              stop-opacity="0"
              :stop-color="getFullFillColor(star)"
            ></stop>
            <stop
              id="stop3"
              :offset="star.percent"
              stop-opacity="1"
              :stop-color="starEmptyColor"
            ></stop>
            <stop
              id="stop4"
              offset="100%"
              stop-opacity="1"
              :stop-color="starEmptyColor"
            ></stop>
          </linearGradient>
        </defs>
      </svg>
    </div>
  </div>
</template>

<script>
export default {
  name: "rating",
  components: {},
  props: {
    value: {
      type: Number,
      default: 4.3,
    },
    starWidth: {
      type: Number,
      default: 24
    },
    starHeight: {
      type: Number,
      default: 24
    },
    starEmptyColor: {
      type: String,
      default: '#737373'
    },
    starActiveColor: {
      type: String,
      default: '#ed8a19'
    },
    stroke: {
      type: Boolean,
      default: false
    }
  },
  data: function () {
    return {
      stars: [],
      emptyStar: 0,
      fullStar: 1,
      totalStars: 5,
    };
  },
  directives: {},
  computed: {
    getStarPoints () {
      let centerX = this.starWidth / 2;
      let centerY = this.starWidth / 2;
      let innerCircleArms = 5; // a 5 arms star
      let innerRadius = this.starWidth / innerCircleArms;
      let innerOuterRadiusRatio = 2.5; // Unique value - determines fatness/sharpness of star
      let outerRadius = innerRadius * innerOuterRadiusRatio;
      return this.calcStarPoints(
        centerX,
        centerY,
        innerCircleArms,
        innerRadius,
        outerRadius
      );
    },
  },
  methods: {
    calcStarPoints(
      centerX,
      centerY,
      innerCircleArms,
      innerRadius,
      outerRadius
    ) {
      let angle = Math.PI / innerCircleArms;
      let angleOffsetToCenterStar = 60;
      let totalArms = innerCircleArms * 2;
      let points = "";
      for (let i = 0; i < totalArms; i++) {
        let isEvenIndex = i % 2 == 0;
        let r = isEvenIndex ? outerRadius : innerRadius;
        let currX = centerX + Math.cos(i * angle + angleOffsetToCenterStar) * r;
        let currY = centerY + Math.sin(i * angle + angleOffsetToCenterStar) * r;
        points += currX + "," + currY + " ";
      }
      return points;
    },
    initStars() {
      for (let i = 0; i < this.totalStars; i++) {
        this.stars.push({
          raw: this.emptyStar,
          percent: this.emptyStar + "%",
        });
      }
    },
    setStars() {
      let fullStarsCounter = Math.floor(this.value);
      for (let i = 0; i < this.stars.length; i++) {
        if (fullStarsCounter !== 0) {
          this.stars[i].raw = this.fullStar;
          this.stars[i].percent = this.calcStarFullness(this.stars[i]);
          fullStarsCounter--;
        } else {
          let surplus = Math.round((this.value % 1) * 10) / 10; // Support just one decimal
          let roundedOneDecimalPoint = Math.round(surplus * 10) / 10;
          this.stars[i].raw = roundedOneDecimalPoint;
          return (this.stars[i].percent = this.calcStarFullness(this.stars[i]));
        }
      }
    },
    getFullFillColor(starData) {
      return starData.raw !== this.emptyStar
        ? this.starActiveColor
        : this.starEmptyColor;
    },
    calcStarFullness(starData) {
      let starFullnessPercent = starData.raw * 100 + "%";
      return starFullnessPercent;
    },
  },
  created() {
    this.initStars();
    this.setStars();
  },
};
</script>
