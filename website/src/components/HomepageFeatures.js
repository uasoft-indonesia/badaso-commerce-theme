import React from "react";
import clsx from "clsx";
import styles from "./HomepageFeatures.module.css";

const FeatureList = [
  {
    title: "Module For Badaso",
    image: require("../../static/img/badaso-logo.png").default,
    description: (
      <>
        It is a long established fact that a reader will be distracted by the
        readable content of a page when looking at its layout.
      </>
    ),
  },
  {
    title: "Create Blog Faster",
    image: require("../../static/img/badaso-post-logo.png").default,
    description: (
      <>
        It is a long established fact that a reader will be distracted by the
        readable content of a page when looking at its layout. 
      </>
    ),
  },
  {
    title: "Powered by Uasoft",
    image: require("../../static/img/uasoft-logo.png").default,
    description: (
      <>
        It is a long established fact that a reader will be distracted by the
        readable content of a page when looking at its layout. 
      </>
    ),
  },
];

function Feature({ image, title, description }) {
  return (
    <div className={clsx("col col--4")}>
      <div className="text--center text-white">
        <img className={styles.featureSvg} src={image} alt={title} />
      </div>
      <div className="text--center text-white padding-horiz--md">
        <h3>{title}</h3>
        <p>{description}</p>
      </div>
    </div>
  );
}

export default function HomepageFeatures() {
  return (
    <section className={styles.features} style={{ backgroundColor: "#000000" }}>
      <div className="container">
        <div className="row">
          {FeatureList.map((props, idx) => (
            <Feature key={idx} {...props} />
          ))}
        </div>
      </div>
    </section>
  );
}
