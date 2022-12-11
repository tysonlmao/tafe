import http.server
import socketserver

PORT = 6969

Handler = http.server.SimpleHTTPRequestHandler

with socketserver.TCPServer(("", PORT), Handler) as httpd:
    print("Serving at port", PORT)
    print("nice.")
    httpd.serve_forever()