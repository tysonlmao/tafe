import React from "react";
import styles from "../styles/modules/Header.module.css";

export default function header() {
    return (
        <>
            <div className={styles.header}>
                <a href="/">
                    <h2 className="text-center mt-5">Flightdeck</h2>
                </a>
            </div>
        </>
    );
}