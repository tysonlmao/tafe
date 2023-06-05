import React from "react";
import styles from "../styles/modules/Header.module.css";
import Link from "next/link";

export default function header() {
    return (
        <>
            <div className={styles.header}>
                <Link href="/">
                    <h2 className="text-center mt-5">Flightdeck</h2>
                </Link>
            </div>
        </>
    );
}