import Link from "next/link";
import React from "react";

async function getLaunches() {
    const res = await fetch('http://localhost:3000/api/launches');
    const data = await res.json();
    return data.results;
}

export default async function LaunchCard() {
    const launches = await getLaunches();
    return (
        <div>
            {launches?.map((launch) => {
                return <Launch key={launch.slug} launch={launch} />;
            })}
        </div>
    );
}

function Launch({ launch }) {
    const { id, slug, name, window_start, lsp_name, mission } = launch || {};

    return (
        <>
            <Link href={`/launches/${id}`} />
            <div>
                <h2>{name}</h2>
                <h2>{mission}</h2>
                <h5>{lsp_name}</h5>
            </div>
        </>
    );
}