import '@/styles/globals.css';
import '@/styles/fonts.css';
import 'bootstrap/dist/css/bootstrap.css';

export default function App({ Component, pageProps }) {
  return (
    <>
      <div className="root">
        <Component {...pageProps} />
      </div>
    </>
  );
}
