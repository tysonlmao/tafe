import { useRouter } from "next/router";
import Header from "@/components/header";
import styles from "../../../styles/modules/Stats.module.css";
import axios from "axios";

export async function getServerSideProps(context) {
    const { id } = context.query;

    const response = await axios.get(`https://ll.thespacedevs.com/2.2.0/launch/${id}/`);
    console.log(response.data);

    let launch = response.data;

    return {
        props: {
            launch,
        },
    };
}

export default function LaunchPage({ launch }) {
    // const router = useRouter();
    // const { id } = router.query;
    console.log(launch);
    // if (!id) {
    //     return <div>Loading...</div>;
    // }

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
