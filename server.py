import http.server
import socketserver

print("select a port")
PORT = input("port?: ")

Handler = http.server.SimpleHTTPRequestHandler

with socketserver.TCPServer(("", PORT), Handler) as httpd:
    print("Serving at port", PORT)
    print("nice.")
    httpd.serve_forever()