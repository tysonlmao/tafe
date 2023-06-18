import Header from "@/components/header";
import styles from "../../../styles/modules/Stats.module.css";
import axios from "axios";
import { useState, useEffect } from "react";
// just read the instructions

export async function getServerSideProps(context) {
    const { id } = context.query;

    const response = await axios.get(`https://ll.thespacedevs.com/2.2.0/launch/${id}/`);
    console.log(response.data);

    let launch = response.data;

    return {
        props: {
            launch,
            init_time: launch.window_start
        },
    };
}

export default function LaunchPage({ launch, init_time }) {
    let imageUrl = launch.image;
    console.log(launch); // debug

    const timeRemaining = () => {
        const window_start = launch.window_start;
        const totalSeconds = Math.floor((Date.parse(window_start) - Date.now()) / 1000);

        const hours = Math.floor(totalSeconds / 3600);
        const minutes = Math.floor((totalSeconds % 3600) / 60);
        const seconds = Math.floor(totalSeconds % 60);

        return { totalSeconds, hours, minutes, seconds };
    };

    const [countdown, setCountdown] = useState(timeRemaining());

    useEffect(() => {
        const interval = setInterval(() => {
            setCountdown(timeRemaining());
        }, 1000);

        return () => clearInterval(interval);
    }, [launch.window_start]);

    const formatTime = (time) => (time < 10 ? `0${time}` : time);

    return (
        <>
            <div className="row">
                <div className="col">
                    <Header />
                    <div className={`${styles.content}`}>
                        <div className={styles.item}>
                            <div className="row d-flex">
                                <div className="col">
                                    <h2 className={styles.heading}>{launch.mission.name}</h2>
                                </div>
                                <div className="col ">
                                    <h2 className={`${styles.heading} text-end`}>{formatTime(countdown.hours)}:{formatTime(countdown.minutes)}:{formatTime(countdown.seconds)}</h2>
                                </div>
                            </div>
                            <h3 className={styles.sub}>{launch.launch_service_provider.name}</h3>
                            <h3 className={styles.sub}>{launch.mission.type}</h3>

                            <h3 className={`${styles.heading} mt-5`}>{launch.rocket.configuration.full_name}</h3>

                        </div>
                        <div className={`${styles.item} mt-2`}>
                            <div className="row">
                                <div className="col">
                                    <h2>{launch.pad.location.name}</h2>
                                </div>
                                <div className="col">
                                    <h2 className="text-end">{launch.weahther_concerns}</h2>
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
