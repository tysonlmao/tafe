import Header from "@/components/header";
import { useEffect, useRef, useState } from "react";
import { useRouter } from "next/router";
import { useContext } from "react";

// const router = useRouter();
// const { id } = router.query;

export default function launch({ launch }) {
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
                </div>
            </div >
        </>
    );
}   