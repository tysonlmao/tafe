import Header from "@/components/header";
import styles from "../../../styles/modules/l.module.css";
import { useRouter } from "next/router";
import { useEffect } from "react";

export default function launch() {
    const router = useRouter();
    const { lid } = router.query;

    useEffect(() => {
        if (lid) {
            // getStuff(lid);
        }
    });

    return (
        <>
            <div className="">
                <div className="site-content">
                    <p className="subtext-1">April 26</p>
                    <h3 className="h-1 mb-3">SpaceX Falcon 9</h3>
                    <div className="row">
                        <div className="col">
                            <p>...</p>
                        </div>
                        <div className="col">
                            <p className="subtext-1 text-center">{}</p>
                            <h3 className={`${styles.value} text-center`}>72°F</h3>
                            <p className="subtext-1 text-center">Window</p>
                            <h3 className={`${styles.value} text-center`}>17:12 UTC</h3>
                        </div>
                    </div>
                </div>
            </div >
        </>
    );
}