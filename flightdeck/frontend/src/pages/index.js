import Head from 'next/head';
import React from 'react';
import Image from 'next/image';
import LaunchCard from "../components/card";


async function getData() {
  const x = await fetch("http://localhost:3000/api/launches");
  const data = await x.json();
  return data;
}

export default function Home() {
  const [data, setData] = React.useState([]);

  React.useEffect(() => {
    getData().then(result => setData(result));
  }, []);
  return (
    <>
      <Head>
        <title>Launchpad • Flightdeck</title>
        <meta name="description" content="Generated by create next app" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="/favicon.ico" />
      </Head>

      <div>
        <h2 className="text-center mt-5">Flightdeck</h2>
        <div>
          <LaunchCard items={data} />
        </div>
      </div>
    </>
  );
}
