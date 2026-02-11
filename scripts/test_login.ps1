$r = Invoke-WebRequest -Uri 'http://127.0.0.1:8000/login' -UseBasicParsing -SessionVariable s
if ($r.Content -match 'name="_token" value="([^"]+)"') { $token = $matches[1]; Write-Output "TOKEN_OK" } else { Write-Output "NO_TOKEN"; exit 2 }
$body = @{
    _token = $token
    email = 'admin@canonfurnitures.com'
    password = 'admin123456'
    remember = 'on'
}
$resp = Invoke-WebRequest -Uri 'http://127.0.0.1:8000/login' -Method POST -Body $body -WebSession $s -UseBasicParsing -MaximumRedirection 0 -ErrorAction SilentlyContinue
if ($resp -ne $null) {
    Write-Output "Status: $($resp.StatusCode) $($resp.StatusDescription)"
    Write-Output "Headers:"; $resp.Headers
} else {
    Write-Output 'No response object (likely redirect).'
}
