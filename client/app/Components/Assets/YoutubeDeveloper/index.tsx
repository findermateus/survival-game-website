import React from "react";

interface YoutubeDeveloperProps {
    url: string
}

const YoutubeDeveloper: React.FC<YoutubeDeveloperProps> = (props) => {
    return <iframe width="100%" height="100%" src={props.url}
                   title="YouTube video player"
                   allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                   referrerPolicy="strict-origin-when-cross-origin"
                   allowFullScreen></iframe>
}

export default YoutubeDeveloper;