import Header from "@/components/header";
import { useEffect, useRef, useState } from "react";
import { useRouter } from "next/router";
import { useContext } from "react";
import axios from "axios";
import styles from "../../../styles/modules/Stats.module.css";

export default function launch({ launch }) {

    async function getStats() {
        try {
            const res = await axios.get("/api/launch");
            console.log(res);
            setLaunches(res.data.results.slice(0, 5)); // Get the first 5 launches
        } catch (error) {
            console.error(error);
        }
    }

    useEffect(() => {
        getStats();
    }, []);


    let imageUrl = "https://spacelaunchnow-prod-east.nyc3.digitaloceanspaces.com/media/launcher_images/falcon_9_block__image_20210506060831.jpg";
    return (
        <>
            <div className="row">
                <div className="col">
                    <Header />
                    <div className={`${styles.content}`}>
                        <div className={styles.item}>
                            <div className="row d-flex">
                                <div className="col">
                                    <h2 className={styles.heading}>mission</h2>
                                </div>
                                <div className="col ">
                                    <h2 className={`${styles.heading} text-end`}>0:00:00</h2>
                                </div>
                            </div>
                            <h3 className={styles.sub}>lsp_name</h3>
                            <h3 className={styles.sub}>mission_type</h3>

                            <h3 className={`${styles.heading} mt-5`}>launcher</h3>

                        </div>
                        <div className={`${styles.item} mt-2`}>
                            <div className="row">
                                <div className="col">
                                    <h2>location</h2>
                                </div>
                                <div className="col">
                                    <h2 className="text-end">??°F</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div className={`col ${styles.image}`} style={{ backgroundImage: `url(${imageUrl})` }}></div>
            </div>
        </>
    );
}   