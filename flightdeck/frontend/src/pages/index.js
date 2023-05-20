import Head from 'next/head';
import React from 'react';
import styles from "../styles/modules/front.module.css";
import Header from '@/components/header';

async function getData() {
  const res = await fetch("http://192.168.0.76:1000/api/launches");
  console.log(res);
  return res.json();
}


let x = getData();
console.log(x);

export default function Home() {
  return (
    <>
      <Head>
        <title>Launchpad</title>
        <meta name="description" content="Generated by create next app" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="/favicon.ico" />
      </Head>

      <div>
        <Header />
        <div className="site-content">
          <h3>Next up</h3>
          <div className={styles.item}>
            <p className={styles.subtext}>LC-39A</p>
            <h3 className={styles.heading}>SpaceX Falcon 9</h3>
            <p className={styles.subtext}>April 26, 2023</p>
          </div>
          <div className={styles.item}>
            <p className={styles.subtext}>LC-39A</p>
            <h3 className={styles.heading}>SpaceX Falcon 9</h3>
            <p className={styles.subtext}>April 26, 2023</p>
          </div>

          <div className={styles.item}>
            <p className={styles.subtext}>LC-39A</p>
            <h3 className={styles.heading}>SpaceX Falcon 9</h3>
            <p className={styles.subtext}>April 26, 2023</p>
          </div>
        </div>
      </div>
    </>
  );
}
