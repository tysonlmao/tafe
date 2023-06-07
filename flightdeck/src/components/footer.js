import React from "react";
import styles from "../styles/modules/Footer.module.css";

export default function footer() {
    return (
        <>
            <div className="text-center mt-5">
                Made by <a href="https://tysonlmao.dev" className={styles.link}>tysonlmao</a>
            </div>
        </>
    );
}