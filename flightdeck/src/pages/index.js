import Head from 'next/head';
import React, { useEffect, useState } from 'react';
import styles from "../styles/modules/Main.module.css";
import Header from '@/components/header';
import Footer from "@/components/footer";
import axios from 'axios';
import Link from 'next/link';
import differenceInSeconds from 'date-fns/differenceInSeconds';
import { TwitterTimelineEmbed } from 'react-twitter-embed';

// dont look at the css for the love of god
export default function Home() {
  const [launches, setLaunches] = useState([]);
  const [countdowns, setCountdowns] = useState({});

  useEffect(() => {
    getStats();
  }, []);

  function formatCountdown(seconds) {
    const days = Math.floor(seconds / (3600 * 24));
    seconds -= days * 3600 * 24;
    const hrs = Math.floor(seconds / 3600);
    seconds -= hrs * 3600;
    const minutes = Math.floor(seconds / 60);
    seconds -= minutes * 60;

    return (days + " days " + hrs + " hours, " + minutes + " minutes, " + seconds);
  }

  useEffect(() => {
    const timerId = setInterval(() => {
      const newCountdowns = {};
      launches.forEach((launch) => {
        const countdown = differenceInSeconds(new Date(launch.window_start), new Date());
        if (countdown > 0) {
          newCountdowns[launch.id] = formatCountdown(countdown);
        } else {
          newCountdowns[launch.id] = 'Launched';
        }
      });
      setCountdowns(newCountdowns);
    }, 1000);

    return () => {
      clearInterval(timerId);
    };
  }, [launches]);


  async function getStats() {
    try {
      const res = await axios.get("/api/launches");
      console.log(res);
      setLaunches(res.data.results.slice(0, 5)); // Get the first 5 launches
    } catch (error) {
      console.error(error);
    }
  }

  return (
    <>
      <Head>
        <title>Launchpad</title>
        <meta name="description" content="Generated by create next app" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
      </Head>
      <Header />
      <div className="site-content mt-2">
        <div className="d-flex row">
          <div className="col">
            <div className={styles.outline}>
              <h3>Next up</h3>
              <br />

              {launches.length > 0 ? (
                launches.map((launch) => (
                  <Link href={`/l/${launch.id}`} className={styles.link} key={launch.id}>
                    <div className={styles.item}>
                      <p className={`${styles.subtext} text-center `}>{launch.lsp_name}</p>
                      <h3 className={`${styles.heading} text-center`}>{launch.mission}</h3>
                    </div>
                  </Link>
                ))
              ) : (
                <>
                  <p>contacting mission control</p>
                  <div className="spinner-border" role="status">
                    <span className="visually-hidden">contacting mission control</span>
                  </div>
                </>
              )}
            </div>
          </div>
          {/* <div className="col">
            <aside className={styles.aside}>
              <TwitterTimelineEmbed
                sourceType='profile'
                screenName='SpaceX'
                options={{ height: 600 }}
              />
            </aside>
          </div> */}

        </div>
        <pre className="text-sm mt-3">spaceX wants to go to mars - which is a barren dessert rock with no nandos so no one actually cares</pre>
        <Footer />

      </div>
    </>
  );
}
