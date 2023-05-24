import Header from "@/components/header";
import styles from "../../../styles/modules/l.module.css";
import { useEffect, useRef, useState } from "react";

import backgroundMusic from "../../../../public/music/The_Quiet_Earth.mp3";


export default function launch({ launch }) {
    const audioRef = useRef(null);
    const [isButtonHidden, setIsButtonHidden] = useState(false);

    const handlePlayAudio = () => {
        if (audioRef.current) {
            audioRef.current.play();
            setIsButtonHidden(true);
        }
    };

    useEffect(() => {
        const audio = audioRef.current;
        if (audio) {
            audio.loop = true; // Enable looping
        }
    }, []);
    return (
        <>
            <Header />
            <div className="">
                <div className="site-content">
                    <p className="subtext-1">April 26</p>
                    <h3 className="h-1 mb-3">SpaceX Falcon 9</h3>
                    <div className="row">
                        <div className="col">
                            <p>...</p>
                        </div>
                        <div className="col">
                        </div>
                    </div>
                    {!isButtonHidden && (
                        <button onClick={handlePlayAudio} className="btn btn-primary">Play Audio</button>
                    )}
                </div>
            </div >
            <audio ref={audioRef} src="/music/The_Quiet_Earth.mp3" />
        </>
    );
}