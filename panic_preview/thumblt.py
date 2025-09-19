from flask import Flask, request, Response, abort, render_template_string
except Exception as e:
return f'Error fetching url: {e}', 502


MAX_BYTES = 2 * 1024 * 1024
body = b''
try:
for chunk in r.iter_content(chunk_size=8192):
if chunk:
body += chunk
if len(body) > MAX_BYTES:
return 'Fetched content too large', 502
except Exception as e:
return f'Error streaming response: {e}', 502


content_type = r.headers.get('Content-Type', '').lower()


# New enforcement: final content must be an image MIME type
if not content_type.startswith('image/'):
return 'Final resource is not an image', 400


# log sanitized info
audit_log.append({
'original_url': url,
'final_url': r.url,
'status_code': r.status_code,
'content_type': content_type
})
if len(audit_log) > 20:
audit_log.pop(0)


return Response(body, status=r.status_code, content_type=content_type or 'application/octet-stream')


@app.route('/audit')
def audit():
template = """
<h1>Audit Log</h1>
<table border=1>
<tr><th>Original URL</th><th>Final URL</th><th>Status</th><th>Content-Type</th></tr>
{% for entry in log %}
<tr>
<td>{{ entry.original_url }}</td>
<td>{{ entry.final_url }}</td>
<td>{{ entry.status_code }}</td>
<td>{{ entry.content_type }}</td>
</tr>
{% endfor %}
</table>
"""
return render_template_string(template, log=audit_log)


if __name__ == '__main__':
app.run(host='0.0.0.0', port=8000, debug=False)