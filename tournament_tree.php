<!DOCTYPE html>
<html>
<head>
<title>KPL Tournament Tree</title>

<style>
body{
    margin:0;
    background: radial-gradient(circle at top, #0f172a 0%, #020617 70%);
    font-family: Arial, sans-serif;
    color:white;
    overflow-x:auto;
}

.wrapper{
    width:2200px;
    height:1100px;
    position: relative;
    margin: auto;
}

/* BOX STYLE */
.box{
    position:absolute;
    padding:8px 18px;
    border-radius:8px;
    background:#0f172a;
    border:1px solid #334155;
    text-align:center;
    box-shadow:0 0 8px rgba(56,189,248,0.15);
}

.team{ min-width:90px; }
.match{ min-width:100px; }

.final{
    background:#2563eb;
    border:none;
    font-size:18px;
    font-weight:bold;
    box-shadow:0 0 18px rgba(37,99,235,0.7);
}

/* LINE STYLE */
svg{
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
}
line{
    stroke:#64748b;
    stroke-width:2;
}
</style>
</head>
<body>
https://viewer.diagrams.net/?tags=%7B%7D&lightbox=1&highlight=0000ff&edit=_blank&layers=1&nav=1&title=Match_Draw.drawio&dark=auto#R%3Cmxfile%3E%3Cdiagram%20id%3D%22C5RBs43oDa-KdzZeNtuy%22%20name%3D%22Page-1%22%3E7V1bl5s2EP41Pqd9cA8S98e9ZZsm28vZtEkfia21aTA4GHvt%2FPpykbhugs0yjOzDk80gJJj5PqHRaMREvVnt70NnvXwI5sybUGW%2Bn6i3E0qJqVvxTyI5ZBJKLT2TLEJ3zksVgkf3G%2BNChUu37pxtKgWjIPAid10VzgLfZ7OoInPCMHiuFnsKvGqra2fBGoLHmeM1pR%2FdebTMpBY1C%2FmvzF0sRcvEsLMzK0cU5k%2ByWTrz4LkkUu8m6k0YBFH2b7W%2FYV6iPaGXj28PH733X4z73%2F7afHX%2Bvn734fd%2Fplllb065JH%2BEkPlR56r33%2FT9frXzyMPi7XV4%2BPbnu%2Ffa1OTmZfOGFlsa4%2BU2wTacsR%2B0IJQXHYRFkrYe%2BWEQRstgEfiOd1dIr8Ng689Zct9KfFSUeR8E61hIYuF%2FLIoOHG3ONgpi0TJaefws27vRp9L%2Ff5OqftH50e2e15weHMSBH4WHT%2BWD0lXJYXFZeiSu45h2wgWLfqRpM4dMTDYWrFhcSXxhyDwncndV7Tsc9Iu8XGHY%2BA%2B37Ql2Vk60amGtqi2el27EHtdOavLnuMuo6j27eud4W371h7urB17njoUR25ces6mLZYmIGr%2Fl54K0JheJSgQxD7Xj3rVHNGiWNPU%2BAEuORC5RG2bFhPKpqu8TynQgKFMFDMo6NJTpCOVjjUERoSw0AQ5lCwrKFoGGsnouY5cj4W8pL1t4GLSriGjXBkK7aoB13CY02jWZO25Dqo5bQ4SyPhCUNQ0MyuBOpz5C%2BVhj6IhQFpqAhrIO5hla4J6hcS5jEOD5E0vFZImByBJzIJYYYE4nBR%2BpmzJ3%2BLZUHb55our7hLI1FJTBnE7REByUrRHKR799EaEsNAENZRPMo6TgYxdbYihTKhWUbUQoi1AtOJYtMJeSgk9rCyWNYD7CwUcNNw4Vb7TBvEpqgKNZ5oAjlStKQ05Vfq9oFswGj54rcO4f%2BNS10NII5yPgTDHhPFTYkShgLqBpg8P5bAKPF71oimBFLB%2BcaLacULW3kUzODl5LHpQXQXqwgblFwckyzpDLEN0nWFPkgiy9vVnayKLBrWiB92JRpmRkJAtqOIlgTfcIsvS2iKCNLCZc6BV8FYGYVRnJYmCSRZgBjSy9BWDbyGLBvVnAXXA6%2BixSkAXbZ%2BktLtZGFqKAOS22Cs0WHSXKK9iidGELgWGLjckWHTOCDBanMA29yhSwMZgNHkLWUR0WiYhifgcbAxEFMz5NhyIKXNqVDe7Zi2UiUoZATNIwLCaaha4uK%2FGqgWYwb8IG9yYMlPi0hN2%2BjTqpa5xq17PI2aoTBS5pywafozJQ56gkIoqJmx%2BANUcFmhFWJwpcSpgNHlM3UOenTiHKeQAeM5sXLG%2BsDni4xDGigOfEGCgJvRK%2BGmxU19nATBYGyx2rMwUueczAzFAFS1hq6A%2FMWSMK%2BGy2gboEB%2BLdqqH2GJjZpmB5TXXEwyU2EQV%2Btk3mhFNTb1gWFc6YGadwuU11PMMlNxEFPB%2FEkDnrVDY8owYNB4sawqU3EQV%2B%2Fljm1FNTrh1ghK4uLL%2BpEQWHS3AiCvg8r3i6EdBHJOigpp8OFt8DTHGywQccZlP3Q7iMl7yYyTzVRn0v%2FeutK68v%2FSO6XgttA461wTd4Mc8mEnHRsW0Te6Vsb%2FHtVrrAZSwRBXwFoDmGMWQIY5hYYQxBl96Cfq10gctZIgp4nNtE2ftURrrg%2BiBYUStBl9gjNby44evN2vErDRhft8kna65ngReEE%2FUq0cnis%2FNTDPr4WZXaz89pI8pT4EfTJ2fleofsklXgB5vstvLzmxQeyVllvc%2FkMVejqeO5Cz87sYntFpVOJU80XQVzfp0f8EcsbjP%2Bt8h%2B9dSSpe8U6bFBEmn6DZ78SBhIT00US26T%2Fwmn9URZemzXtrIkLysM2Kka%2Bv1qSi1klsnPCPMngqSxCgQSYaqhRJ7CIJGQ9LCoMYNDXiOHhJ5uKJCXyfrR5g3lj1RwRs%2F71Ly4VuiB961FTSUdKaUWqF6SH0rycl0xEfMTi9IN1DWeHuZqLwurYODlqqgR1IiZnbFDIGygFwxcnh8h8O7L2QR7L%2FsFg73fQn%2BRtVa%2BAKb6EfidA02UWLGEmbGE4HowfcShyWsY0y12Z7QzRqvnxsKtrYDfm1A8y8gXXL4IO%2BDxpVsopQNfNLjQIPzmh9a484LQNeqEstXHhPKr%2BNItEaQDXwzA8Rh4KN0aN4yTgy99eDCv4ku31fEd%2BGLrcHwBn1G2xi0YhK5RPX5hBzy%2BUCi%2BELXu8cM5MCr4DJmN6sCMhKnbAY8w3UL8XQgD6MGIbYgBCTPu9iAIg%2Brx26catnfCdAvydyEMoAsjFsIBEoaOhJGCMBSbMN0SVLsQBtCHUcAJY4yrYmTIbCUq%2BHJBgvNpIxmnd1TcPc5f8d2kzdJZJ3%2FXYTBjm017B%2FnZmX1ZpEb8Yxt5rs9aO85uec5HdJz5wAJ8Gzaigseu84cb2YTMJtrdmYVnk3hseDZZcGtz1QE%2BUzY6upKwSeZ3E4WbZyV2bSUiIJ3gP2IpFDXSCZtO3f3gAejUbaFiFzpBjvW6ry4QKl6yvRNDPdbVmoVufF8sLKR%2FChFtN8GTu2dzzo8XVf%2FGjQklVlnP3Z1YYf3gZBYpr8Aune5kJ6vdTrZRHUTomt6Dmfaafe%2Ffa7Or3cpY70L6bvo47T5IS7Ihqlp%2ByQibKAy%2BsJssc%2BPWDxL0x%2BbwvJqIZ1zczuLbSKx8nSjVnTneFT%2BxcufzF7rDhiWFoZL8jsoNi%2FSMWuIH1XjmRz19I8n4%2BMCc1aZk%2BqzSV9hePYKjJqkZvw%2BKvmT77kOKS7f91VC2V2q2r30UtkNQecITSopzpVQS9e5%2F%3C%2Fdiagram%3E%3C%2Fmxfile%3E
</body>
</html>
