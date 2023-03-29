import "./bootstrap";
import { createApp } from "vue";

const app = createApp({});

import ExampleComponent from "./components/ExampleComponent.vue";
app.component("example-component", ExampleComponent);

app.mount("#app");

// Add event listener for DOMContentLoaded
window.addEventListener("DOMContentLoaded", () => {
    const joinConferenceButton = document.getElementById("join-conference-button");

    if (joinConferenceButton) {
        joinConferenceButton.addEventListener("click", async () => {
            const appId = joinConferenceButton.dataset.appId;
            const roomName = joinConferenceButton.dataset.roomName;
            const localVideo = document.getElementById("local-video");
            const remoteVideo = document.getElementById("remote-video");

            try {
                await joinChannel(appId, roomName, localVideo, remoteVideo);
            } catch (error) {
                console.error("Failed to join channel:", error);
            }
        });
    }
});
