# Preview Panic (CTF Challenge)


## Build & Run


docker build -t thumbit-ctf .
docker run --rm -p 8000:8000 thumbit-ctf


## Public endpoints
- /fetch?url=<url> : Fetch an external image (with naive checks, redirects allowed, final content-type must be image/*)
- /audit : Shows recent fetch attempts (sanitized)


## Internal-only endpoints (localhost only, not exposed)
- http://127.0.0.1:8080/internal/flag → FLAG: cbc{redirect_ssrf_thumbs_up}
- http://127.0.0.1:8081/internal/exif.png → PNG with EXIF metadata containing FLAG: cbc{exif_based_flag_bonus}


## Player objectives
- Primary: Exploit SSRF via redirects to fetch the flag at /internal/flag
- Secondary (harder): Discover and extract the EXIF flag from /internal/exif.png


## Hints
- The preview service validates only the *original* URL string, not the final destination.
- Final content must appear to be an image.
- Check the audit log for clues on how URLs are followed.